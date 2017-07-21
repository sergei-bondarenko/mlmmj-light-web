#!/bin/bash

function load_config()
{
    parent_path=$( cd "$(dirname "${BASH_SOURCE}")" ; pwd -P )
    lists_path=$(cat $parent_path/config.txt | grep lists_path | sed 's/.*=//g' | sed 's/[[:blank:]]//g')
    web_url=$(cat $parent_path/config.txt | grep web_url | sed 's/.*=//g' | sed 's/[[:blank:]]//g')
}

if [ "$#" -ne 2 ]; then
    echo "With this script you can create and delete domains for mailing lists."
    echo
    echo "Usage:"
    echo "$0 add list.example.com"
    echo "$0 del list.example.com"
    exit 1
fi

load_config
operation=$1
domain=$2

if [ "${operation}" = "add" ]; then
    password=$(apg -MCLN -m 12 -a 1 -n 1)
    hash=$(echo -n $password | sha256sum | head -c 64)
    mkdir -p $lists_path/$domain
    echo $domain:$hash >> $lists_path/passwords.txt
    chown mlmmj:mlmmj -R $lists_path
    echo -e "Domain: ${domain} \nPass: ${password}\nURL: ${web_url}"
fi

if [ "${operation}" = "del" ]; then
    find_domain=$(sed -n "/^${domain}:.*/p" $lists_path/passwords.txt)
    if [ -z "${find_domain}" ]; then
        echo "ERROR: No such domain. Aborting."
        exit 1
    else
        sed -i -e "/^${domain}:.*/d" $lists_path/passwords.txt
        rm -r $lists_path/$domain
        echo -e "Domain $domain has been deleted."
    fi
fi
