var computed = false;
var decimal = 0;

function convert(entryform, from, to){
    convertfrom = from.selectedIndex;
    convertto = to.selectedIndex;
    entryform.display.value = (entryform.input.value * from[convertfrom].value / to[convertto].value);
}

function addchar(input,character){
    if ((character == '.' && decimal == "0") || character != '.') {
        input.value = (input.value == "" || input.value == "0") ? character : input.value + character;
        convert(input.form, input.form.measure1, input.form.measure2);
        computed = true;
        if (character == '.'){
            decimal = 1;
        }
    }
}

function openVothcom(){
    window.open("", "Display window", "toolbar=no,directories=no,menubar=no");
}

//funkcja czyści formularz
function clear(form){
    form.input.value = 0;
    form.display.value = 0;
    decimal = 0;
}

//funkcja zmienia kolor tła strony
function changeBackground(hexNumber){
    document.body.bgColor = hexNumber;
}