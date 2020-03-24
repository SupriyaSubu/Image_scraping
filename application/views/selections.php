<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style>
        #div {
            border: 1px dotted #000;
            position: absolute;
        }
    </style>
</head>
<body>
    <div id="div" hidden></div>
        <label>Product_Name</label><br>
        <label>Price</label>
        
    </body>
</html>

<script>
    var div = document.getElementById('div'), x1 = 0, y1 = 0, x2 = 0, y2 = 0;
    function reCalc() { //This will restyle the div
        var x3 = Math.min(x1,x2); //Smaller X
        var x4 = Math.max(x1,x2); //Larger X
        var y3 = Math.min(y1,y2); //Smaller Y
        var y4 = Math.max(y1,y2); //Larger Y
        div.style.left = x3 + 'px';
        div.style.top = y3 + 'px';
        div.style.width = x4 - x3 + 'px';
        div.style.height = y4 - y3 + 'px';
    }
    onmousedown = function(e) {
        div.hidden = 0; //Unhide the div
        x1 = e.clientX; //Set the initial X
        y1 = e.clientY; //Set the initial Y
        reCalc();
    };
    onmousemove = function(e) {
        x2 = e.clientX; //Update the current position X
        y2 = e.clientY; //Update the current position Y
        reCalc();
    };
    onmouseup = function(e) {
        div.hidden = 1; //Hide the div
    };
</script>