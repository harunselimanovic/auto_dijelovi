function myFunction1(){
    var element1 = document.getElementById("forma1");
    var element2 = document.getElementById("forma2");
    var element3 = document.getElementById("forma3");
    element1.classList.toggle("mystyle");
    element2.classList.remove("mystyle");
    element3.classList.remove("mystyle");
}

function myFunction2(){
    var element1 = document.getElementById("forma1");
    var element2 = document.getElementById("forma2");
    var element3 = document.getElementById("forma3");
    element1.classList.remove("mystyle");
    element2.classList.toggle("mystyle");
    element3.classList.remove("mystyle");
}

function myFunction3(){
    var element1 = document.getElementById("forma1");
    var element2 = document.getElementById("forma2");
    var element3 = document.getElementById("forma3");
    element1.classList.remove("mystyle");
    element2.classList.remove("mystyle");
    element3.classList.toggle("mystyle");
}