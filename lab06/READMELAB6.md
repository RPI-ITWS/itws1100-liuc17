Carina Liu

Professor Plotka
ITWS1100 - INTRO TO ITWS

LAB 6 - jQUERY
10/21/24

Personal Website Link: 
http://127.0.0.1:3000/lab03/index.html

Lab Page:
http://127.0.0.1:3002/lab06/lab6.html

Repo Link:
https://github.com/RPI-ITWS/itws1100-liuc17

Through this lab, I learned a lot about how to use jQuery to make a website more interative for users. By solving the problems in the JS file, I got to practice directly modifying the DOM by changing text styles, and structures using methods like .hide(), .show(), .html(), etc. This helped me to understand how to dynamically update the UI based on user interactions. In addtion, using event listeners such as click() and event delegation with .on() I was able to make my web page even more interactive, and deal with dynamically added items. Overall, this lab taught me very practical skills for creating responsive and interactive web pages. 
   
// Problem 4b (10 pts) - what happens when you click on the new li?  Why? (Explain in your readme file)
//   ie if it works as after #3 above, why? if it doesn't, why not?  How would you fix it?

Problem 4b - what happens when you click on the new li? Why? 
When I add a new list item, and I click on the new list item, it does not turn red like the other List items. This is because when I dynamically added list items using the append() method, the event listener that was originally attached to the existing list items doesn't automatically apply to the newly added items. I solved this problem using event delegation. This allows me to handle events on elements that are added dynamically. 

