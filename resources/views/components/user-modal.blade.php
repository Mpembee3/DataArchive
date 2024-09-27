<!-- Member Modal -->

<div class="modal fade" id="userModal{{ $user->id }}" tabindex="-1" aria-labelledby="userModalLabel{{ $user->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel{{ $user->id }}">{{$user->member->fname}} {{$user->member->lname}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Email: {{$user->email}} </p>
                    <p>Phone: {{$user->member->phone}}</p>
                    <p>Role: {{$user->role->name}}</p>
                    
                </div>
            </div>
        </div>
    </div>

   