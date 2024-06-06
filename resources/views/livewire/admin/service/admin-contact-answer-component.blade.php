<div>
    <style>
        .form-group {
            margin-bottom: 1rem;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .text-danger{
            color: red;
            font-weight: 600;
        }

    </style>

    <h2>Répondre au Contact</h2>

    <form wire:submit.prevent="submitForm">
        <div class="form-group">
            <label for="recipient">Envoyer à :</label>
            <input type="text" class="form-control" id="recipient" value="{{ $contactInfo['email'] }}" readonly>
        </div>

        <div class="form-group">
            <label for="subject">Objet :</label>
            <input type="text" class="form-control" id="subject" wire:model="subject">
            @error('subject')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" rows="5" wire:model="message"></textarea>
            @error('message')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
