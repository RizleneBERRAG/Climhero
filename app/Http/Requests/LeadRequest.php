<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class LeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            'email' => ['required', 'email:rfc', 'max:150'],
            'phone' => ['required', 'string', 'regex:/^[0-9 +().-]{9,20}$/'],
            'postal_code' => ['required', 'string', 'regex:/^[0-9]{5}$/'],
            'city' => ['nullable', 'string', 'max:120'],
            'profile' => ['required', 'in:particulier,professionnel,bailleur'],
            'service' => ['nullable', 'string', 'in:' . implode(',', array_keys(config('services_catalog')))],
            'project_type' => ['nullable', 'in:installation,remplacement,depannage,entretien'],
            'housing_type' => ['nullable', 'in:maison,appartement,local'],
            'current_heating' => ['nullable', 'in:' . implode(',', array_keys(config('aides.chauffage_actuel')))],
            'deadline' => ['nullable', 'in:urgent,trois_mois,six_mois,information'],
            'message' => ['nullable', 'string', 'max:3000'],
            'consent' => ['accepted'],

            // Piege a robots : doit rester vide.
            'website' => ['nullable', 'size:0'],
            // Horodatage d'ouverture du formulaire.
            'started_at' => ['nullable', 'numeric'],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Merci d indiquer votre prenom.',
            'last_name.required' => 'Merci d indiquer votre nom.',
            'email.required' => 'Nous avons besoin de votre email pour vous envoyer le devis.',
            'email.email' => 'Cette adresse email ne semble pas valide.',
            'phone.required' => 'Un numero de telephone nous permet de vous rappeler rapidement.',
            'phone.regex' => 'Ce numero de telephone ne semble pas valide.',
            'postal_code.required' => 'Le code postal du chantier est necessaire.',
            'postal_code.regex' => 'Le code postal doit contenir 5 chiffres.',
            'profile.required' => 'Merci de preciser si vous etes particulier ou professionnel.',
            'consent.accepted' => 'Merci d accepter l utilisation de vos donnees pour etre recontacte.',
            'website.size' => 'Une erreur est survenue, merci de reessayer.',
        ];
    }

    /**
     * Deuxieme filet anti-robot : un formulaire rempli en moins de trois
     * secondes est presque toujours envoye par un script.
     */
    public function withValidator(Validator $validator): void
    {
        $validator->after(function (Validator $validator) {
            $startedAt = (int) $this->input('started_at');

            if ($startedAt > 0 && (time() - (int) ($startedAt / 1000)) < 3) {
                $validator->errors()->add('message', 'Merci de prendre le temps de completer le formulaire.');
            }
        });
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone' => preg_replace('/\s+/', ' ', trim((string) $this->input('phone'))),
            'postal_code' => trim((string) $this->input('postal_code')),
            'email' => mb_strtolower(trim((string) $this->input('email'))),
        ]);
    }
}
