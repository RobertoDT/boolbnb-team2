@extends('layouts.main')

@section('title', 'BoolBnB')

@section('header')
    @include('layouts.header-general')
@endsection

@section('mainContent')

<div class="container index_message">
    <div class="page-title">
        <h3 class="title premium_name">I Tuoi Messaggi</h3>
    </div>
    <div class="panel-body">
      <div class="table-responsive-sm">
        <table class="table table-hover mails">
          <tbody>
            <tr>
                <th scope="col">Proprietà</th>
                <th scope="col">Ricevuto da</th>
                <th scope="col" class="tronca">Messaggio</th>
                <th scope="col" class="giorno_ora">Giorno e ora</th>
            </tr>
            <!-- autoincrement variabile i = 0
          prima della chiusura del for incremento i++ -->
            @php
            $i = 0;
            @endphp
            @foreach($properties as $property)
              @foreach($property->messages as $message)
                <tr scope="row" class="row_messages">
                  <td class="mail-rateing riga">
                      <img class="foto_messaggio" src="{{asset('storage/'.$property->flat_image)}}" alt="">
                      <span>{{$property->title}}</span>
                  </td>
                  <td class="riga">
                      {{$message->email}}
                  </td>
                  <td class="riga">
                    <!-- Button trigger modal -->
                    <div class="tronca">
                      <a class="message_link" data-toggle="modal" data-target="#exampleModal{{$i}}">
                        {{$message->text}}
                      </a>
                    </div>
                    <!-- /Button trigger modal -->

                  </td>
                    <!-- Modal -->
                    <div class="modal fade at_center" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title white" id="exampleModalLabel{{$i}}">Da: {{$message->email}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body white">
                            <h5>Testo: </h5>
                            <p>{{$message->text}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /Modal -->
                  <td class="text-center created_at">
                      <p class="riga">{{$message->created_at}}</p>
                  </td>
                </tr>
                @php
                $i++;
                @endphp
              @endforeach
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
</div>

@endsection
