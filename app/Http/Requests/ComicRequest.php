<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComicRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:200',
            'description' => 'nullable|max:500',
            'thumb' => 'nullable|url',
            'price' => 'nullable|numeric|between:0,999.99',
            'series' => 'nullable|max:100',
            'sale_date' => 'nullable|date',
            'type' => [
                'nullable',
                Rule::in(['comic book', 'graphic novel']),
            ],
            'artists' => 'nullable|alpha|max:200',
            'writers' => 'nullable|alpha|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Il campo Titolo è obbligatorio.',
            'title.max' => 'Il campo Titolo non può superare i :max caratteri.',
            'description.max' => 'Il campo "Descrizione non può superare i :max caratteri.',
            'thumb.url' => "Il link dell'immagine deve essere un URL valido.",
            'price.numeric' => 'Il campo Prezzo deve essere un valore numerico.',
            'price.between' => 'Il campo Prezzo deve essere compreso tra 0 e 1000.',
            'series.max' => 'Il campo Serie non può superare i :max caratteri.',
            'sale_date.date' => 'Il campo Data di Vendita deve essere una data valida.',
            'type.in' => 'Il campo Tipo deve essere "comic book" o "graphic novel".',
            'artists.alpha' => 'Il campo Disegnatori può contenere solo caratteri alfabetici.',
            'artists.max' => 'Il campo Disegnatori non può superare i :max caratteri.',
            'writers.alpha' => 'Il campo Scrittori può contenere solo caratteri alfabetici.',
            'writers.max' => 'Il campo Scrittori non può superare i :max caratteri.',
        ];
    }
}
