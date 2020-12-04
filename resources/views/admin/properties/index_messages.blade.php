@extends('layouts.main')

@include('layouts.header-general')

@section('mainContent')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
  <div class="wraper bootstrap snippets bootdeys bootdey">
    <div class="page-title">
        <h3 class="title premium_name">I Tuoi Messaggi</h3>
    </div>
    <div class="col-md-12">

            <div class="panel-body">
                <table class="table table-hover mails">
                    <tbody>
                      <tr>
                          <th>Proprietà</th>
                          <th>Ricevuto da</th>
                          <th class="tronca">Messaggio</th>
                          <th class="giorno_ora">Giorno e ora</th>
                      </tr>
                      <!-- autoincrement variabile i = 0
                    prima della chiusura del for incremento i++ -->
                      @php
                      $i = 0;
                      @endphp
                      @foreach($properties as $property)
                        @foreach($property->messages as $message)
                        <tr class="row_messages">
                            <td class="mail-rateing riga">
                                <img class="foto_messaggio" src="{{asset('storage/'.$property->flat_image)}}" alt="">
                                <span>{{$property->title}}</span>
                            </td>
                            <td class="riga">
                                {{$message->email}}
                            </td>
                            <td class="riga">

                              <!-- Modal -->
                              <div class="modal fade at_center" id="exampleModal{{$i}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title white" id="exampleModalLabel{{$i}}">Cc: {{$message->email}}</h5>
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
                              <!-- Button trigger modal -->
                              <div class="tronca">
                                <a class="message_link" data-toggle="modal" data-target="#exampleModal{{$i}}">
                                  {{$message->text}}
                                </a>
                              </div>

                            </td>
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
@endsection
