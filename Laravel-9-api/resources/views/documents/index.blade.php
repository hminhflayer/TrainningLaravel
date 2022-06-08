@extends('layouts.app')

@section('content')
    <div>
        <div class="card-header text-center"><h2>Thông tin Documents</h2></div>
        <!-- (A) WE WILL GENERATE THE TABLE HERE -->
        <div id="demoA"></div>
    </ul>
    </div>
@endsection
<script>
    window.addEventListener("load", () => {
        axios.get('/api/document/get_all')
            .then(function (response) {
               var data = response.data[0];
               // (B) PARSE THE JSON STRING INTO OBJECT FIRST
                console.log(data);
                // console.table(data);
                
                // (C) GENERATE TABLE
                // (C1) CREATE EMPTY TABLE
                var table = document.createElement("table"), row, cellA, cellB;
                document.getElementById("demoA").appendChild(table);
                data.forEach(element => {
                    row = table.insertRow();
                    for (let key in element) {
                        if(key == "_id")
                        {
                            continue;
                        }
                        // (C2) ROWS & CELLS
                        cellA = row.insertCell();
                        cellB = row.insertCell();
                        // (C3) KEY & VALUE
                        cellA.innerHTML = "| " + key + ": ";
                        cellB.innerHTML = element[key];
                    }
                });
            })
            .catch(function (error) {
                // handle error
                console.log(error);
                return null;
            })
            .then(function () {
                // always executed
            });
    
    });

    function Delete(id)
    {
        alert(id)
    }
</script>
