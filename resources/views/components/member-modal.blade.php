<!-- Member Modal -->

<div class="modal fade" id="memberModal{{ $member->id }}" tabindex="-1" aria-labelledby="memberModalLabel{{ $member->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="memberModalLabel{{ $member->id }}">{{ $member->fname }} {{ $member->lname }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Phone: {{ $member->phone }}</p>
                    <p>Email: {{ $member->email }}</p>
                    <p>Address: {{ $member->address }}</p>
                    <p>Gender: {{ $member->gender }}</p>
                    <p>Marital Status: {{ $member->marital_status }}</p>
                    <p>Deacon: {{ optional($member->supervisor)->lname }}</p>
                    <p>Family: {{ $member->family_id }}</p>
                    
                </div>
            </div>
        </div>
    </div>

   