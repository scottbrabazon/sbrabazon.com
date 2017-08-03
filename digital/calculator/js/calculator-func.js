// Calculator Function //


// Variables //

var input = [];
var sum = [];
var display = 0;
var total = 0;


// Numbers //

function input0() {
    input.push(0);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input1() {
	input.push(1);
	display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input2() {
    input.push(2);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input3() {
    input.push(3);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input4() {
    input.push(4);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input5() {
    input.push(5);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input6() {
    input.push(6);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input7() {
    input.push(7);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input8() {
    input.push(8);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function input9() {
    input.push(9);
    display = input.join("");
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputDecimal() {
    if (input.includes('.'))
    {
        input.push("");
    }
    else
    {
        input.push(".");
    }
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}


// Functions //

function inputAC() {
    input = [];
    oldNumber = 0;
    sum = [];
    display = 0;
    previousNumber = 0;
    total = 0;
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputNegative() {
    input.push("-");
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputPercent() {
    sum.push(display);
    total = eval(sum.join(""));
    sum = [];
    sum.push(total);
    sum.push("/100");
    total = eval(sum.join(""));
    display = total;
    input = [];
    document.getElementById("placeholder").innerHTML = display;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputPlus() {
    input.join("")
    input = [];
    sum.push(display);
    sum.push("+");
    display = 0;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputMinus() {
    input = [];
    sum.push(display);
    sum.push("-");
    display = 0;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputMultiply() {
    input = [];
    sum.push(display);
    sum.push("*");
    display = 0;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputDivide() {
    input = [];
    sum.push(display);
    sum.push("/");
    display = 0;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
}

function inputEquals() {
    sum.push(display);
    total = eval(sum.join(""));
    display = eval(sum.join(""));
    sum = [];
    input = [];
    previousNumber = 0;
    document.getElementById("placeholder").innerHTML = total;
    // console.log("input = " + input);
    // console.log("display = " + display);
    // console.log("sum = " + sum);
    // console.log("total = " + total);
    // console.log("********************");
    total = 0;
}


