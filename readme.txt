//todo how to install mongodb and mongodb driver for php
//todo how to test locally
//todo how to use mongolab


DOCUMENTATION


IMPORTANT NOTE

Make sure that on the top of every page of the website you have <?php require_once("connection.php"); ?>
included. If you do not you will not be able to access the database.


I will include an example.php of a simple php page that grids out work so you can see everything in action.
More information about everything can be found here.

I will go through
SETTING UP THE BACKEND
ADDING WORK TO THE DATABASE
RETRIEVING WORK FROM THE DATABASE
HOW TO USE THE PUT THE WORK YOU RETRIEVE ON A PAGE





SETTING UP THE BACKEND

Go into config.php and change the year to the current school year.
Change the url to the url of the website (set this to localhost:yourportnumber if you are developing locally)
On line 9 of connection.php change $GLOBALS['workDB'] = $db->work2015 so that the number is the current year





ADDING TO THE DATABASE

Create an HTML form and have the form sent to submit.php using
the action attribute on the form element. Make sure enctype is
set to "multipart/form-data" and that the method is post.

For each input element the name attribute will be what the entry in the database
is called for that value. So when you are querying the database for the results later
you will refer to that piece of data by what you have set the name attribute to.

<form method="post" enctype="multipart/form-data" action="/submit.php">
    <input type="text" name="name" placeholder="Your Name"/>
    <input type="text" name="major" placeholder="Major"/>
    <input type="file" name="siteFiles" accept=".zip"/>
    <input type="submit"/>
</form>

This form will structure the data as such:

{
"name": "whatever the user typed in",
"major": "whatever the user typed in",
"siteFiles": "the url where the files are located"
}


You do not have to set up any specific structure for the data to take. Whatever named
inputs you add into the form will automatically be added into the database.

And any zipped folders that are uploaded with the input type of "file" will be uploaded
into a userWork folder on the server and unzipped. (if there are issues with specific uploaded files
when developing the front end, check to make sure the work was unzipped properly)

Then all you have to do is send everyone a link to the html page that includes the form and when they
submit to it everything will automatically be added to the database.





RETREIVING WORK FROM THE DATABASE

I have included a php function for finding work on the database. If you call it without passing anything into
it you will receive all of the work. You can also pass in search parameters to get only work by specific students, specific
kinds of work, or filter your results in any way that your data allows.

The function is called "findWork"

To use it and retrieve everything that has been uploaded:
<?php

$studentWork = findWork();

?>

Use the options parameter to filter results like so:
<?php

findWork( array(
"the name of the entry in the database" => "the value you are looking for",
"entry 2" => "value 2",
etc,
etc
));

?>

A more concrete example:
(to only find work by Alex Hartwell)
<?php

$alexWork = findWork( array(
"name" => "alex hartwell"
));

?>







HOW TO USE THE WORK YOU RETRIEVE

After you use the findWork function you are able to iterate through the work outputting it onto the page.
You can iterate through it and template it like so:

<?php
$studentWork = findWork();
?>


<?php foreach ($studentWork as $piece) { ?>
  <div class="work">
  <h2><?php echo $piece['name']; ?></h2>
  <h3><?php echo $piece['major']; ?></h3>

  </div>


<?php } ?>

Where within the foreach loop $piece refers to each individual entry in the database.
$piece['name of entry in database']
