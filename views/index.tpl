<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$page_title}</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3">
            <div class="page-header">
                <h1 class="text-center text-uppercase">{$page_title}</h1>
            </div>
            <form method="post" action="#result">
                <div class="form-group {if $errMsg}has-error{/if}">
                    <label class="control-label" for="exampleInput">Input</label>
                    <input type="number" class="form-control" name="number" id="exampleInput"
                           placeholder="Input number" required
                           value="{if isset($smarty.post.number)}{$smarty.post.number}{/if}">

                    {if $errMsg}
                        <p class="text-danger">{$errMsg}</p>
                    {/if}

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <hr class="clearfix"/>

            {if isset($result1)}
                <div class="form-group" id="result">
                    <label>Result 1</label>
                    <p style="word-break: break-all;">{$result1}</p>
                </div>
            {/if}

            {if isset($result2)}
                <div class="form-group">
                    <label>Result 1</label>
                    <p style="word-break: break-all;">{$result1}</p>
                </div>
            {/if}

            {if $historyData}
                <label>Result 2</label>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Param</th>
                            <th>Num"HaNoi"</th>
                        </tr>
                        </thead>
                        <tbody>
                        {foreach name=history from=$historyData item=history}
                            <tr>
                                <td>{$smarty.foreach.history.index + 1}</td>
                                <td>{$history.date}</td>
                                <td>{$history.param}</td>
                                <td>{$history.numHaNoi}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
            {/if}

        </div>
    </div>
</div>
</body>
</html>