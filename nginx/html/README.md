# dnsmasq GUI
dnsmasq GUI is a simple Web GUI for editing the /etc/hosts file on a computer, with the intention of using it for easily setting up results for dnsmasq use.

## Installation
All you need is a webserver capable of running PHP, and a browser compatible with HTML5 and JavaScript.

I tested using Apache2 on Windows using Google Chrome 103, but I can't see why it wouldn't work on any other browser or webserver given that it's all native PHP/HTML/JS.

The only external resource used is a font from Google Fonts for the header.

# WARNING
In order to add and remove entries to /etc/hosts by default on most Linux operating systems, you will need to change the permissions to allow users other then root to write to the file. By default on Ubuntu, PHP executes scripts as `www-data`, and /etc/hosts is owned by the group `adm` which is used for monitoring, not admin. Do NOT `chown` the file to www-data, as that could have unintended consequences!

I recommend doing the following (at your own risk):
`$ sudo usermod -aG adm www-data`
`$ sudo chmod g+w /etc/hosts`

This will add www-data to the adm group, and give the group write ability to hosts.

If you're not comfortable doing this, the GUI will still work for showing you what domains resolve to what IPs in your configuration, it just will be unable to modify anything.


## Features
- Display all results in the /etc/hosts file
- Add new results
- Remove resultts

## TODO:
- Allow editing dnsmasq configuration file, potentially via parsing it into HTML elements but alternatively just a in-browser text editor.
- Check to make sure the domain doesn't already exist when adding a record
- Ensure dnsmasq refreshes when a change is made

## LICENSE
Please refer to the LICENSE file in the repository.

## Contributing
Contributions are welcome, please try to stick with how I've got things formatted (so CRLF, 4 spaces, etc) but if there's a tidier way or you want to fix some broken formatting that's okay with me!