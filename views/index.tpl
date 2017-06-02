<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$page_title}</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-push-4">
            <div class="page-header">
                <h1 class="text-center text-uppercase">{$page_title}</h1>
            </div>
            <form method="post" action="">
                <div class="form-group">
                    <label for="exampleInput">Input</label>
                    <input type="number" class="form-control" name="number" id="exampleInput"
                           placeholder="Input number" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr class="clearfix"/>

            {if isset($result1)}
            <div class="result1">
                <div class="page-header">
                    <p>Result 1</p>
                </div>
                {$result1}
            </div>
            {/if}
        </div>
    </div>
</div>
</body>
</html>