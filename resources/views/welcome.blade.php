<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    QES EXPORT
                </div>
                <div class="content">


<table style="float:center; width:100%">
<tr style="float:center;">
<td style="float:center; width:30%">
                  <form id="year" action="handle" method="post" accept-charset="UTF-8">
                    {{ csrf_field() }}
                    
                    <table style="float:right;width:68%">
                <td style="float:left;width:33%">
                  <select style="width:100%" name="year" form="year">

                    <option value="" selected disabled hidden>Jahr Wählen</option>
                        <?php foreach ($years as $key => $valuetwo) {
                            echo '<option value=' . $valuetwo->year . '>' . $valuetwo->year . '</option>';
                        } ?>
                  </select>
                </td>
                <td style="float:left">
                  <button type="submit" value="preview" name="ACTION">Vorschau</button>
                </td>
                <td style="float:left">
                  <button type="submit" value="export" name="ACTION">Export</button>
                </td>
            </table>
            </form>
            </td>

</tr>
<tr><td>&nbsp</td></tr>
</table>

</div>
                <div class="links">
                    <a href="https://qes.gesis.intra">Zurück zu QES</a>
                    <a href="https://qes.gesis.intra/dbExportDokumentation">Dokumentation</a>
                    <a href="https://qes.gesis.intra/issues">Einen Fehler Melden</a>
                   
                </div>
                    <?php echo('<!--' . print_r(\DB::Table('quarter')->orderBy('year')->select('year', 'q')->get(), 1) . '-->'); ?>
            </div>
        </div>
    </body>
</html>
