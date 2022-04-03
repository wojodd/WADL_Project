<?PHP



$selected_radio = $_POST['gender'];
print $selected_radio;





if (isset($_POST['Submit1'])) {

$selected_radio = $_POST['gender'];
print $selected_radio;

}

$male_status = 'unchecked';
$female_status = 'unchecked';

if (isset($_POST['Submit1'])) {

$selected_radio = $_POST['gender'];

if ($selected_radio == 'male') {

$male_status = 'checked';

}
else if ($selected_radio == 'female') {

$female_status = 'checked';

}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<FORM name ="form1" method ="post" action ="#">

<Input type = 'Radio' Name ='gender' value= 'male'
<?PHP print $male_status; ?>
>Male

<Input type = 'Radio' Name ='gender' value= 'female'
<?PHP print $female_status; ?>
>Female

<P>
<Input type = "Submit" Name = "Submit1" VALUE = "Select a Radio Button">

</FORM>
</body>
</html>