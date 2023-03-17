<!doctype html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/datatables.min.css') }}">

    <!-- Styles -->
    <style>
        body {
            padding: 3em;
        }

        .dataTables_filter {
            float: right;
            margin-bottom: 1em;
        }

        .dataTables_filter:after {
            clear: both;
        }

        .dt-buttons a .glyphicon {
            visibility: hidden;
        }

        .dt-buttons a:hover .glyphicon {
            visibility: visible;
        }
    </style>
</head>

<body>
   
    
       
    <div class="container-fluid">

<h4 class="data-title text-center">
              <strong>Selected Polling Unit Results</strong> 
            </h4>
        <div class="content">
            

            <div class="dropdown mt-10">
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select LGA
                <span class="caret"></span></button>
                <ul class="dropdown-menu text-center">
                    @foreach ( $lga as $lg)
                    <li><a href="{{ route('lga_result', $lg->uniqueid) }}">{{ $lg->lga_name }}</a></li> 
                    @endforeach
                  
                  {{-- <li><a href="#">CSS</a></li>
                  <li><a href="#">JavaScript</a></li> --}}
                </ul>
              
    
        </div><br>

        
          

            <table  class="datatables table table-striped table-bordered dataTable`">
                <thead>
                    <tr role="row">
                        <th scope="col">LGA</th>
                        <th scope="col">Polling Unit</th>
                        <th scope="col">Party Name</th>
                        <th scope="col">Party Score</th>
                        <th scope="col">Collated By</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">LGA</th>
                        <th scope="col">Polling Unit</th>
                        <th scope="col">Party Name</th>
                        <th scope="col">Party Score</th>
                        <th scope="col">Collated By</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach ($puResult as $pr)
                        <tr role="row" class="odd">
                            {{-- <td class="">{{ $loop->iteration }}.</td> --}}
                            <td>{{ $pr->lga->lga_name }}</td>
                            <td>{{ $pr->polling_unit_name }}</td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>
                        @foreach ($pr->announced_pu_results as $apr)
                            <tr role="row" class="odd">
                                <td class=""></td>
                                <td class=""></td>
                                <td>{{ $apr->party_abbreviation }}</td>
                                <td>{{ $apr->party_score }}</td>
                                <td>{{ $apr->entered_by_user }}</td>
                            </tr>
                        @endforeach
                    @endforeach

                </tbody>
            </table><br>





            <h4 class="data-title text-center">
                 <strong>Total Result in Selected LGA</strong> 
            </h4>
        <div class="content">
            

            <table class="datatables table table-striped table-bordered dataTable`">
                <thead>
                    <tr role="row">
                        <th scope="col">LGA</th>
                        <th scope="col">Polling Unit</th>
                        <th scope="col">total vote</th>
                        <th scope="col">Collated By</th>

                    </tr>
                </thead>
              
                <tbody>

                    @foreach ($puTotal as $pt)
                        <tr role="row" class="odd">
                            {{-- <td class="">{{ $loop->iteration }}.</td> --}}
                            <td>{{ $pt->lga->lga_name }}</td>
                            <td>{{ $pt->polling_unit_name }}</td>
                            <td>{{ $pt->psum }}</td>
                            <td>{{ $pt->lga->entered_by_user }}</td>
                            {{-- <td>{{ $pt->entered_by_user }}</td> --}}
                         

                        </tr>
                    @endforeach

                </tbody>
            </table>



        </div>
    </div>


    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                initComplete: function() {
                    this.api()
                        .columns()
                        .every(function() {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo($(column.footer()).empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d +
                                        '</option>');
                                });
                        });
                },
            });
        });
    </script>
</body>

</html>
