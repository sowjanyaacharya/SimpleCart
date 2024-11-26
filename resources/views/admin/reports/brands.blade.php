@extends('admin.dashboard')
@section('title', 'Report-brands')
@section('content')
<div class="card">
    <div class="card-header">
        <h2>Brand Report</h2>
    </div>
    <div class="card-body">
        <!--Here the form doesnot contain the action where to move it takes current page url while submitting-->
        <form id="brand-report-form">
            <div class="form-group">
                <label>As on</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div><br/>
            <button type="submit" class="btn btn-primary">Generate</button>
        </form>
        <div id="report-result">
        </div>
    </div>
</div>
<script>
    document.getElementById('brand-report-form').addEventListener('submit',function (e){
        e.preventDefault();
        const date=document.getElementById('date').value;
        //to display the date format
        const date_split=date.split('-');
        const format_Date=`${date_split[2]}/${date_split[1]}/${date_split[0]}`;
        fetch(`/api/brand-report?date=${date}`)
        .then(response => response.json())
        .then(data => {
            let brandrpt = `<h3>Brand Report As On ${format_Date}</h3>`;
            if(data.brands.length > 0) {
                brandrpt += `<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>BrandName</th>
                            </tr>
                            </thead>
                            <tbody>`;
                    data.brands.forEach((brands) => {
                        brandrpt += `<tr>
                               <td>${brands.id}</td>
                        <td>${brands.brandname}</td>
                        </tr>`;
                    });
                    brandrpt += `</tbody></table>`;
            }
            else
            {
                brandrpt += `<p>No Data Found</p>`;
            }
            document.getElementById('report-result').innerHTML = brandrpt;
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Something wrong')
        });
    });
</script>
@endsection

