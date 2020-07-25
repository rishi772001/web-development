var a = 5;

class student {
  constructor(name, age, dept) {
    this.name = name;
    this.age = age;
    this.group = dept;
  }
}

var s = new student("rishi", 20, "cse");
console.log(s.name);
console.log(s.age);
console.log(s.group);

//Closures

var add = (function () {
  var counter = 0;
  return function () {
    counter += 1;
    return counter;
  };
})();

function count() {
  document.getElementById("count").innerHTML = "current value =" + add();
}

//Hoisting - You no need to declare a variable before assigning but should be declared wherever within that scope.
//This can be overrided bu "use strict";

function hoist() {
  //works good
  a = 5;
  console.log("Hoist " + a);
  var a;
}

//use strict

function strict() {
  ("use strict");
  //Throw error when assign a variable without declaring and deleting
  a = 5;
  console.log(a);
  var a;
}
hoist();
strict();
