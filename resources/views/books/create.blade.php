<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Books Managment System</title>
    </head>
    <body>
        <h1>You Can Create Book From Here</h1>
        <form action="/books/store" method="post">
            @csrf
            <fieldset>
                <label for="title">Title :</label>
                <input type="text" name="Name" />

                <label for="title">Description :</label>
                <textarea type="text" name="Description"></textarea>

                <label for="title">Price :</label>
                <input type="number" name="Price" />
                <input type="submit" value="Create Book" />
            </fieldset>
        </form>
    </body>
</html>
