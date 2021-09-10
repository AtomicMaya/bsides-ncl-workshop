# XSS Writeup

## technical info for challenge

this challenge is an XSS based challenge in which the user must aquire the flag(base64 encoded) that is hidden in a linked php file, of course since php is weird they wont see that its linked theyll just see that there is a script somewhere. The idea behind this is to use JS to detect a flag, its checking the type of alert, if its undefined it immediately skips but if its **not** undefined **and** the message is `flag` itll replace their message with the actual flag(base64 encoded)

## Solution

The user must submit to one of the boxes on the form and insert something that allows it to make an alert. the alert has to have the msg _flag_ or nothing will happen itll just echo what they just entered below. once they aquire the flag they have to decode it using their own brains or you know... just google 'base64 decoder' and click on the first result.

## for reviewers

this can obviously be edited in anyway you see fit. i **_highly_** recommend changing the placeholders for the form as theyre there mainly so that yall can read it properly.

---

thank you and have a wonderful test/playthrough,

~Sable
