#!/bin/zsh

printf "Server Started.\nTo view go to: http://127.0.0.1:8080/\n";
php --server 127.0.0.1:8080 index.php
