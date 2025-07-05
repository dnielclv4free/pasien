<button id="deleteButton">Delete</button>

<div id="deleteModal" style="display:none; border: 1px solid #ccc; padding: 20px; background-color: #f9f9f9; margin-top: 20px;">
    <form method="post" action="{{route('user.destroy', $user->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" id="confirmDelete">Ya, Yakin</button>
        <button type="button" id="cancelDelete">Batal</button>
    </form>
</div>

<script>
    const deleteButton = document.getElementById('deleteButton');
    const deleteModal = document.getElementById('deleteModal');
    const cancelButton = document.getElementById('cancelDelete');

    deleteButton.addEventListener('click', function() {
        deleteModal.style.display = 'block';
    });

    cancelButton.addEventListener('click', function() {
        deleteModal.style.display = 'none';
    });

</script>
