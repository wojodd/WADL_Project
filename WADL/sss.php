<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
   .select {
    position: relative;
    display: inline-block;
    margin-bottom: 15px;
    width: 40%;
}    .select select {
        font-family: 'Arial';
        display: inline-block;
        width: 100%;
        cursor: pointer;
        padding: 10px 18px;
        outline: 0;
        border: 0px solid #000000;
        border-radius: 9px;
        background: #ffffff;
        color: #1642ad;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }
        .select select::-ms-expand {
            display: none;
        }
        .select select:hover,
        .select select:focus {
            color: #2a45ab;
            background: #ffffff;
        }
        .select select:disabled {
            opacity: 0.4;
            pointer-events: none;
        }
        </style>
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
</div>
    
</body>
</html>