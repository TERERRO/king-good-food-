<!DOCTYPE html>
<html lang="en">
<head>
<link href="../style.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin panel</title>
</head>
<body>
    <h1 class="text-success text-center" >
        Librarian Management panel
    </h1>
    <div class="container pt-3 mb-3">
        <h3 class="text-center p-2">Insert data in here</h3>
        <form  action="insert.php" method="POST" enctype="multipart/form-data" class="form-group form mx-3">
            <div class="form-inline mb-3 col-12">
            <input class="px-4 pt-2 col-6" type="text" placeholder="Enter the name of the book" name="bookname" >
            </div>
            <div class="form-inline mb-3 col-12">
            <input class="px-4 pt-2 col-6" type="text" placeholder="Enter the book ISBN here" name="bookisbn" >
            </div>
            <div class="form-inline mb-3 ">
            <input  class="px-4 pt-2 col-6" type="file"  name="bookimage" >
            </div>
            <div class="form-inline mb-3 col-12">
            <input class="px-4 pt-2 col-6 btn btn-primary" type="submit" value="Save the book" name="savebook" >
            </div>

                </form>
    </div>
</body>
</html>