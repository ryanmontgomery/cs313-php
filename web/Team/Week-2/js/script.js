function clicked() {
    alert("Clicked");
}

function changeColor() {
    var colorHex = '#'
    var newColor = colorHex.concat($('#div1TextColor').val());
    alert(newColor);
    $('#div1').css('color', newColor);
}