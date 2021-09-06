@extends('layouts.index')

@section('content')
<!-- As a heading -->
<nav class="navbar navbar-light bg-light shadow p-3 mb-5 bg-body rounded">
    <div class="container-fluid ">
      <span class="navbar-brand mb-0 h1 " style="margin-left: 80px;">ZieClass</span>
    </div>
  </nav>

<div class="container ml-3 mr-3" style="font-family: arial;">
    <div class="d-flex bd-highlight">
        <h1 class="bd-highlight" style="width: 90%;">Tugas</h1>
        {{-- <button class=" btn btn-primary  flex-shrink-5 bd-highlight"><i class="fas fa-plus-square"></i> Buat Tugas</button> --}}
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Buat Tugas
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Tugas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        
            @csrf
            <div class="mb-3">
              <label for="nama_mapel" class="col-form-label">Mata Pelajaran : </label>
              <input type="text" class="form-control" id="nama_mapel" name="nama_mapel">
            </div>

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
    <table border="0"  class="ml-5" style="width:100%;" cellpadding="10">
        <tr style="border-bottom: 1px solid grey;">
            <th><h2>Produktif</h2></th>
            
        </tr>
        @foreach ($P as $key=>$value)
            
        <tr style="border-bottom: 1px solid grey;">
            <td width="35%">{{ $value->nama_tugas }}</td>
            <td width="20%">{{ $value->deadline_time }}</td>
            <td width="15%">
                @if ($value->status_pengerjaan == 1)
                <h6>Ditugaskan</h6>
                @else
                <h6>Diselesaikan</h6>
                @endif
            </td>
            <td width="14%">
                @if ($value->status_pengerjaan == 1)
                
                @else
                {{ $value->skor }}/100 
                @endif
            </td>

            
           {{-- href="{{ url('tugas/'.$value->id) }}" --}}
           <td width="17%">
                @if ($value->status_pengerjaan == 1)
                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tandai sebagai selesai
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Skor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
        
            @csrf
            <div class="mb-3">
              <label for="skor" class="col-form-label">SKOR : </label>
              <input type="number" class="form-control" id="skor" name="skor">
            </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    
    </div>
  </div>
</div>
                @else
                <a class="btn btn-secondary">Batalkan pengiriman</a>
                @endif
           </td>
            {{-- <td width="17%"><a class="btn {{ ($value->status_pengerjaan == 1) ? 'btn-primary' : 'btn-secondary' }}">
                {{ ($value->status_pengerjaan == 1) ? 'Tandai sebagai selesai' : 'Batalkan pengiriman' }}
            </a>
        </td> --}}
        </tr>
        @endforeach
    </table>
    


    
    <table border="0" class="ml-5 mt-5" style="width:100%;" cellpadding="10" >
        <tr style="border-bottom: 1px solid grey;">
            <th><h2>English</h2></th>
        </tr>
        @foreach ($E as $key=>$ing)
            
        <tr style="border-bottom: 1px solid grey;">
            <td width="35%">{{ $ing->nama_tugas }}</td>
            <td width="20%">{{ $ing->deadline_time }}</td>
            <td width="15%">
                @if ($ing->status_pengerjaan == 1)
                <h6>Ditugaskan</h6>
                @else
                <h6>Diselesaikan</h6>
                @endif
            </td>
            <<td width="14%">
                {}
            </td>
            <td width="17%">
                @if ($ing->status_pengerjaan == 1)
                <a href="{{ url('tugas/'.$ing->id) }}" class="btn btn-primary">Tandai sebagai selesai</a>  
                @else
                <a href="{{ url('tugas/'.$ing->id) }}" class="btn btn-secondary">Batalkan pengiriman</a>
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">Tambahkan Skor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form action="" method="POST">
                      <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                          <label for="skor" class="col-form-label">SKOR : </label>
                          <input type="number" class="form-control" id="skor" name="skor">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Tambah Skor</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
                
                <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Input score</a>
                @endif
           </td>
            {{-- <td width="17%"><button class="btn {{ ($value->status_pengerjaan == 1) ? 'btn-primary' : 'btn-secondary' }}">{{ ($value->status_pengerjaan == 1) ? 'Tandai sebagai selesai' : 'Batalkan pengiriman' }}</button></td> --}}
        </tr>
        @endforeach
    </table>
</div>
@endsection