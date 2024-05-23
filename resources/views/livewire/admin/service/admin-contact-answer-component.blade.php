<!-- resources/views/livewire/contact-form.blade.php -->

<div>
    <h2>Formulaire de Contact</h2>

    <form wire:submit.prevent="submitForm">
        <div class="form-group">
            <label for="recipient">Envoyer à :</label>
            <input type="text" class="form-control" id="recipient" wire:model="recipient" @if($contactInfo['email']) value="{{$contactInfo['email']}}" @endif readonly>
        </div>


        <div class="form-group">
            <label for="subject">Objet :</label>
            <input type="text" class="form-control" id="subject" wire:model="subject">
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" rows="5" wire:model="message"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div> 
