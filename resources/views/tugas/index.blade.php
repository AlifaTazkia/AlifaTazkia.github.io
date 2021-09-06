@extends('layouts.index')


@section('content')
<!-- As a heading -->
<nav class="navbar navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
    <div class="container-fluid ">
      <span class="navbar-brand mb-0 h1 " style="margin-left: 80px;">ZieClass</span>
    </div>
  </nav>

<div class="container " style="font-family: arial;">
    <div class="d-flex bd-highlight pl-3">
        <h1 class="bd-highlight " style="width: 87%; margin-left: 20px;">Tugas</h1>
        {{-- <button class=" btn btn-primary  flex-shrink-5 bd-highlight"><i class="fas fa-plus-square"></i> Buat Tugas</button> --}}
         <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  <i class="fas fa-plus"></i> Buat Tugas
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambahkan Tugas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="tugas" method="POST">
        <div class="modal-body">
          
              @csrf
              <div class="mb-3">
                <label for="nis" class="col-form-label">NIS: </label>
                <input class="form-control" type="text" placeholder="9089383" aria-label="Disabled input example" disabled>
              </div>
             
              <div class="mb-3 dropdown">
                Mata Pelajaran :
                <br>
                <select class="btn btn-light border dropdown-toggle" style="width: 465px;" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" name="nama_mapel" id="nama_mapel"class="dropdown">
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                  <option value="#"><a class="dropdown-item"></a></option>
                  <option value="Produktif"><a class="dropdown-item">Produktif</a></option>
                  <option value="English"><a class="dropdown-item">English</a></option>
                  </div>
                </select>
              </div>
              
              {{-- <div class="dropdown">
                <label for="nama_mapel" class="col-form-label"><a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                  
                </a></label>
                
              
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <li><a class="dropdown-item" name="nama_mapel">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div> --}}
              
              <div class="mb-3">
                <label for="nama_tugas" class="col-form-label">Nama Tugas : </label>
                <input type="text" class="form-control" id="nama_tugas" name="nama_tugas">
              </div>
  
              <div class="mb-3">
                <label for="deadline_time" class="col-form-label">Deadline : </label>
                <input type="date" class="form-control" id="deadline_time" name="deadline_time">
              </div>

              
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambahkan Tugas</button>
        </div>
      </form>
      
      </div>
    </div>
  </div>


      </div>
<br>
    <table border="0"  class="ml-5 mt-5" style="width:100%;" cellpadding="20">
        <tr style="border-bottom: 1px solid rgb(206, 198, 198);">
            <th><h2>Produktif</h2></th>
            
        </tr>
        @foreach ($P as $key=>$value)
            
        <tr style="border-bottom: 1px solid rgb(206, 198, 198);">
            <td>
              @if ($value->status_pengerjaan == 1)
              <img style="width: 32px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQyMC43MDYsNjYuODRoLTY1LjY1OHYtOC45NjljMC05LjIyLTcuNDc1LTE2LjY5Ni0xNi42OTYtMTYuNjk2aC0yNi45MzVDMzA0LjIzNSwxNy4zNzksMjgyLjEwOCwwLDI1NS45OTksMCAgICBzLTQ4LjIzNiwxNy4zNzktNTUuNDE4LDQxLjE3N2gtMjYuOTM1Yy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTZ2OC45NjlIOTEuMjkyYy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTYgICAgdjQxMS43NjdjMCw5LjIyLDcuNDc1LDE2LjY5NiwxNi42OTYsMTYuNjk2aDMyOS40MTVjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2VjgzLjUzNiAgICBDNDM3LjQwMiw3NC4zMTYsNDI5LjkyOCw2Ni44NCw0MjAuNzA2LDY2Ljg0eiBNMTkwLjM0Miw3NC41NjhoMjQuNDhjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2ICAgIGMwLTEzLjQ5OSwxMC45ODItMjQuNDgxLDI0LjQ4MS0yNC40ODFjMTMuNDk5LDAsMjQuNDgxLDEwLjk4MiwyNC40ODEsMjQuNDgxYzAsOS4yMiw3LjQ3NSwxNi42OTYsMTYuNjk2LDE2LjY5NmgyNC40OCAgICBjMCwzLjY3LDAsMjMuODc5LDAsMjYuMTcySDE5MC4zNDJDMTkwLjM0Miw5OC42MjksMTkwLjM0Miw3OC4yMjYsMTkwLjM0Miw3NC41Njh6IE0zMjIuMTQ4LDQxMS43NjRIMTg5Ljg1MSAgICBjLTkuMjIsMC0xNi42OTYtNy40NzUtMTYuNjk2LTE2LjY5NnM3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NiAgICBTMzMxLjM2OCw0MTEuNzY0LDMyMi4xNDgsNDExLjc2NHogTTMyMi4xNDgsMzIzLjA2NUgxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTYgICAgYzAtOS4yMiw3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDMxNS41OSwzMzEuMzY4LDMyMy4wNjUsMzIyLjE0OCwzMjMuMDY1eiAgICAgTTMyMi4xNDgsMjM0LjM2N0gxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTZjMC05LjIyLDcuNDc1LTE2LjY5NiwxNi42OTYtMTYuNjk2aDEzMi4yOTYgICAgYzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDIyNi44OTIsMzMxLjM2OCwyMzQuMzY3LDMyMi4xNDgsMjM0LjM2N3oiIGZpbGw9IiMyYzZkYmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
      
              @else
                   <img style="width: 32px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQyMC43MDYsNjYuODRoLTY1LjY1OHYtOC45NjljMC05LjIyLTcuNDc1LTE2LjY5Ni0xNi42OTYtMTYuNjk2aC0yNi45MzVDMzA0LjIzNSwxNy4zNzksMjgyLjEwOCwwLDI1NS45OTksMCAgICBzLTQ4LjIzNiwxNy4zNzktNTUuNDE4LDQxLjE3N2gtMjYuOTM1Yy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTZ2OC45NjlIOTEuMjkyYy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTYgICAgdjQxMS43NjdjMCw5LjIyLDcuNDc1LDE2LjY5NiwxNi42OTYsMTYuNjk2aDMyOS40MTVjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2VjgzLjUzNiAgICBDNDM3LjQwMiw3NC4zMTYsNDI5LjkyOCw2Ni44NCw0MjAuNzA2LDY2Ljg0eiBNMTkwLjM0Miw3NC41NjhoMjQuNDhjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2ICAgIGMwLTEzLjQ5OSwxMC45ODItMjQuNDgxLDI0LjQ4MS0yNC40ODFjMTMuNDk5LDAsMjQuNDgxLDEwLjk4MiwyNC40ODEsMjQuNDgxYzAsOS4yMiw3LjQ3NSwxNi42OTYsMTYuNjk2LDE2LjY5NmgyNC40OCAgICBjMCwzLjY3LDAsMjMuODc5LDAsMjYuMTcySDE5MC4zNDJDMTkwLjM0Miw5OC42MjksMTkwLjM0Miw3OC4yMjYsMTkwLjM0Miw3NC41Njh6IE0zMjIuMTQ4LDQxMS43NjRIMTg5Ljg1MSAgICBjLTkuMjIsMC0xNi42OTYtNy40NzUtMTYuNjk2LTE2LjY5NnM3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NiAgICBTMzMxLjM2OCw0MTEuNzY0LDMyMi4xNDgsNDExLjc2NHogTTMyMi4xNDgsMzIzLjA2NUgxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTYgICAgYzAtOS4yMiw3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDMxNS41OSwzMzEuMzY4LDMyMy4wNjUsMzIyLjE0OCwzMjMuMDY1eiAgICAgTTMyMi4xNDgsMjM0LjM2N0gxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTZjMC05LjIyLDcuNDc1LTE2LjY5NiwxNi42OTYtMTYuNjk2aDEzMi4yOTYgICAgYzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDIyNi44OTIsMzMxLjM2OCwyMzQuMzY3LDMyMi4xNDgsMjM0LjM2N3oiIGZpbGw9IiM5MzkzOTMiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
              @endif
            </td>
            <td width="35%" class="fw-bolder">{{ $value->nama_tugas }}</td>
            {{-- <td width="20%">{{ $value->deadline_time }}</td> --}}
            <td width="20%"><b>Tenggat, </b>{{ date('d M ', strtotime($value->deadline_time))}}</td>
            <td width="15%">
                @if ($value->status_pengerjaan == 1)
                <h6 class="badge bg-warning text-dark" >Ditugaskan</h6>
                @else
                <h6 class="badge bg-success">Diselesaikan</h6>
                @endif
            </td>
            
            <td width="14%">
              @if ($value->status_pengerjaan == 1)
                  
              @else
                  <b>skor : </b>{{ $value->skor }}
              @endif
           </td>

            
           {{-- href="{{ url('tugas/'.$value->id) }}" --}}
           <td width="17%">
            @if ($value->status_pengerjaan == 1)
                <a href="{{ url('tugas/'.$value->id) }}" class="btn btn-primary">Tandai sebagai selesai</a>
                @else
                <a href="{{ url('tugas/'.$value->id) }}" class="btn btn-secondary"style="width:183px;">Batalkan pengiriman</a>
                <a class="btn btn-success mt-3"  href=" {{ url('tugas/'.$value->id.'/edit') }} " style="width:183px;" role="button">Tambah Skor</a>
                @endif
                
  
           </td>
           {{-- <td>
             @if ($value->status_pengerjaan == 1)

             @else
            
             @endif
           </td> --}}
            {{-- <td width="17%"><a class="btn {{ ($value->status_pengerjaan == 1) ? 'btn-primary' : 'btn-secondary' }}">
                {{ ($value->status_pengerjaan == 1) ? 'Tandai sebagai selesai' : 'Batalkan pengiriman' }}
            </a>
        </td> --}}
        </tr>
        @endforeach
    </table>
    


    
    <table border="0" class="ml-5 " style="width:100%; margin-top:150px; " cellpadding="20" >
        <tr style="border-bottom: 1px solid rgb(206, 198, 198);">
            <th><h2>English</h2></th>
        </tr>
        @foreach ($E as $key=>$ing)
            
        <tr style="border-bottom: 1px solid rgb(206, 198, 198);">
          <td>
            @if ($value->status_pengerjaan == 1)
            <img style="width: 32px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQyMC43MDYsNjYuODRoLTY1LjY1OHYtOC45NjljMC05LjIyLTcuNDc1LTE2LjY5Ni0xNi42OTYtMTYuNjk2aC0yNi45MzVDMzA0LjIzNSwxNy4zNzksMjgyLjEwOCwwLDI1NS45OTksMCAgICBzLTQ4LjIzNiwxNy4zNzktNTUuNDE4LDQxLjE3N2gtMjYuOTM1Yy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTZ2OC45NjlIOTEuMjkyYy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTYgICAgdjQxMS43NjdjMCw5LjIyLDcuNDc1LDE2LjY5NiwxNi42OTYsMTYuNjk2aDMyOS40MTVjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2VjgzLjUzNiAgICBDNDM3LjQwMiw3NC4zMTYsNDI5LjkyOCw2Ni44NCw0MjAuNzA2LDY2Ljg0eiBNMTkwLjM0Miw3NC41NjhoMjQuNDhjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2ICAgIGMwLTEzLjQ5OSwxMC45ODItMjQuNDgxLDI0LjQ4MS0yNC40ODFjMTMuNDk5LDAsMjQuNDgxLDEwLjk4MiwyNC40ODEsMjQuNDgxYzAsOS4yMiw3LjQ3NSwxNi42OTYsMTYuNjk2LDE2LjY5NmgyNC40OCAgICBjMCwzLjY3LDAsMjMuODc5LDAsMjYuMTcySDE5MC4zNDJDMTkwLjM0Miw5OC42MjksMTkwLjM0Miw3OC4yMjYsMTkwLjM0Miw3NC41Njh6IE0zMjIuMTQ4LDQxMS43NjRIMTg5Ljg1MSAgICBjLTkuMjIsMC0xNi42OTYtNy40NzUtMTYuNjk2LTE2LjY5NnM3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NiAgICBTMzMxLjM2OCw0MTEuNzY0LDMyMi4xNDgsNDExLjc2NHogTTMyMi4xNDgsMzIzLjA2NUgxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTYgICAgYzAtOS4yMiw3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDMxNS41OSwzMzEuMzY4LDMyMy4wNjUsMzIyLjE0OCwzMjMuMDY1eiAgICAgTTMyMi4xNDgsMjM0LjM2N0gxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTZjMC05LjIyLDcuNDc1LTE2LjY5NiwxNi42OTYtMTYuNjk2aDEzMi4yOTYgICAgYzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDIyNi44OTIsMzMxLjM2OCwyMzQuMzY3LDMyMi4xNDgsMjM0LjM2N3oiIGZpbGw9IiMyYzZkYmYiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
    
            @else
                 <img style="width: 32px;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEuMSIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHhtbG5zOnN2Z2pzPSJodHRwOi8vc3ZnanMuY29tL3N2Z2pzIiB3aWR0aD0iNTEyIiBoZWlnaHQ9IjUxMiIgeD0iMCIgeT0iMCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTIiIHhtbDpzcGFjZT0icHJlc2VydmUiIGNsYXNzPSIiPjxnPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgoJPGc+CgkJPHBhdGggZD0iTTQyMC43MDYsNjYuODRoLTY1LjY1OHYtOC45NjljMC05LjIyLTcuNDc1LTE2LjY5Ni0xNi42OTYtMTYuNjk2aC0yNi45MzVDMzA0LjIzNSwxNy4zNzksMjgyLjEwOCwwLDI1NS45OTksMCAgICBzLTQ4LjIzNiwxNy4zNzktNTUuNDE4LDQxLjE3N2gtMjYuOTM1Yy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTZ2OC45NjlIOTEuMjkyYy05LjIyLDAtMTYuNjk2LDcuNDc1LTE2LjY5NiwxNi42OTYgICAgdjQxMS43NjdjMCw5LjIyLDcuNDc1LDE2LjY5NiwxNi42OTYsMTYuNjk2aDMyOS40MTVjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2VjgzLjUzNiAgICBDNDM3LjQwMiw3NC4zMTYsNDI5LjkyOCw2Ni44NCw0MjAuNzA2LDY2Ljg0eiBNMTkwLjM0Miw3NC41NjhoMjQuNDhjOS4yMiwwLDE2LjY5Ni03LjQ3NSwxNi42OTYtMTYuNjk2ICAgIGMwLTEzLjQ5OSwxMC45ODItMjQuNDgxLDI0LjQ4MS0yNC40ODFjMTMuNDk5LDAsMjQuNDgxLDEwLjk4MiwyNC40ODEsMjQuNDgxYzAsOS4yMiw3LjQ3NSwxNi42OTYsMTYuNjk2LDE2LjY5NmgyNC40OCAgICBjMCwzLjY3LDAsMjMuODc5LDAsMjYuMTcySDE5MC4zNDJDMTkwLjM0Miw5OC42MjksMTkwLjM0Miw3OC4yMjYsMTkwLjM0Miw3NC41Njh6IE0zMjIuMTQ4LDQxMS43NjRIMTg5Ljg1MSAgICBjLTkuMjIsMC0xNi42OTYtNy40NzUtMTYuNjk2LTE2LjY5NnM3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NiAgICBTMzMxLjM2OCw0MTEuNzY0LDMyMi4xNDgsNDExLjc2NHogTTMyMi4xNDgsMzIzLjA2NUgxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTYgICAgYzAtOS4yMiw3LjQ3NS0xNi42OTYsMTYuNjk2LTE2LjY5NmgxMzIuMjk2YzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDMxNS41OSwzMzEuMzY4LDMyMy4wNjUsMzIyLjE0OCwzMjMuMDY1eiAgICAgTTMyMi4xNDgsMjM0LjM2N0gxODkuODUxYy05LjIyLDAtMTYuNjk2LTcuNDc1LTE2LjY5Ni0xNi42OTZjMC05LjIyLDcuNDc1LTE2LjY5NiwxNi42OTYtMTYuNjk2aDEzMi4yOTYgICAgYzkuMjIsMCwxNi42OTYsNy40NzUsMTYuNjk2LDE2LjY5NkMzMzguODQzLDIyNi44OTIsMzMxLjM2OCwyMzQuMzY3LDMyMi4xNDgsMjM0LjM2N3oiIGZpbGw9IiM5MzkzOTMiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIHN0eWxlPSIiIGNsYXNzPSIiPjwvcGF0aD4KCTwvZz4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8L2c+CjxnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjwvZz4KPGcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPC9nPgo8L2c+PC9zdmc+" />
            @endif
          </td>
            <td width="35%" class="fw-bolder">{{ $ing->nama_tugas }}</td>
            <td width="20%"><b>Tenggat, </b>{{ date('d M ', strtotime($ing->deadline_time))}}</td>
            <td width="15%">
                @if ($ing->status_pengerjaan == 1)
                <h6 class="badge bg-warning text-dark" >Ditugaskan</h6>
                @else
                <h6 class="badge bg-success">Diselesaikan</h6>
                @endif
            </td>

           
            <td width="14%">
               @if ($ing->status_pengerjaan == 1)
                   
               @else
                   <b>skor : </b>{{ $ing->skor }}
               @endif
            </td>
            
              <td width="17%">
                @if ($ing->status_pengerjaan == 1)
                    <a href="{{ url('tugas/'.$ing->id) }}" class="btn btn-primary">Tandai sebagai selesai</a>
                    @else
                    <a href="{{ url('tugas/'.$ing->id) }}" class="btn btn-secondary" style="width:183px;">Batalkan pengiriman</a>
                    <a class="btn btn-success mt-3"  href=" {{ url('tugas/'.$ing->id.'/edit') }} "style="width:183px;" role="button">Tambah Skor</a>
                    @endif
                    
      
               </td>
           
            {{-- <td width="17%"><button class="btn {{ ($value->status_pengerjaan == 1) ? 'btn-primary' : 'btn-secondary' }}">{{ ($value->status_pengerjaan == 1) ? 'Tandai sebagai selesai' : 'Batalkan pengiriman' }}</button></td> --}}
        </tr>
        @endforeach
    </table>
</div>
@endsection