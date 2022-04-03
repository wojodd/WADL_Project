
<!DOCTYPE html>
<html lang="en">
<head>

<style> 
.select {
    position: relative;
    display: inline-block;
    margin-bottom: 15px;
    width: 145px;
}    .select select {
        font-family: 'Arial';
        display: inline-block;
        width: 100%;
        cursor: pointer;
        padding: 3px 12px;
        outline: 0;
        border: 1px solid rgb(0, 13, 134);
        border-radius: 11px;
        background: #f8f8f8;
        color: #333333;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }
        .select select::-ms-expand {
            display: none;
        }
        .select select:hover,
        .select select:focus {
            color: rgb(0, 13, 134);
            background: #f9f9f9;
        }
        .select select:disabled {
            opacity: 0.5;
            pointer-events: none;
        }
.select_arrow {
    position: absolute;
    top: 10px;
    right: 31px;
    width: 6px;
    height: 6px;
    border: solid rgb(0, 13, 134);
    border-width: 0 2px 2px 0;
    display: inline-block;
    padding: 3px;
    transform: rotate(45deg);
    -webkit-transform: rotate(45deg);
}
.select select:hover ~ .select_arrow,
.select select:focus ~ .select_arrow {
    border-color: #333333;
}
.select select:disabled ~ .select_arrow {
    border-top-color: #cccccc;
}
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="select">
    <select>
        <option>--Select--</option>
        <option>Hello 1</option>
        <option>Hello 2</option>
        <option>Hello 3</option>
        <option>Hello 4</option>
    </select>
    <div class="select_arrow">
    </div>
</div>
</body>
</html>