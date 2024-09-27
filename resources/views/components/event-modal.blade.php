<!-- Member Modal -->

<div class="modal fade" id="eventModal{{ $event->id }}" tabindex="-1" aria-labelledby="eventModalLabel{{ $event->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel{{ $event->id }}">{{$event->title}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Description: {{$event->description}}</p>
                    <p>Start: {{$event->start_date}}</p>
                    <p>End: {{$event->end_date}}</p>
                    <p>Location:{{$event->location}} </p>
                     
                </div>
            </div>
        </div>
    </div>

   