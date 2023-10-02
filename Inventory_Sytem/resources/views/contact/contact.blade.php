@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-900 via-blue-600 to-blue-300">
    <div class="max-w-4xl mx-auto p-6 bg-white bg-opacity-80 rounded-lg shadow-lg dark:bg-gray-800 text-gray-800 dark:text-gray-200">
        <h1 class="text-4xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Contact Our Inventory</h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
            We'd love to hear from you! If you have any questions, feedback, or inquiries, please don't hesitate to reach out to us.
        </p>
        <p class="text-lg text-gray-700 dark:text-gray-300 mt-4 leading-relaxed">
            You can contact us via email at <a href="mailto:contact@ourinventory.com" class="text-blue-500 hover:underline">contact@ourinventory.com</a> or by filling out the form below:
        </p>
        <form action="{{ route('contact-form') }}" method="POST" class="mt-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-800 dark:text-gray-200 text-lg font-semibold mb-2">Your Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-800 dark:text-gray-200 text-lg font-semibold mb-2">Your Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-200">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-gray-800 dark:text-gray-200 text-lg font-semibold mb-2">Your Message</label>
                <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-gray-200"></textarea>
            </div>
            <div>
                <button type="submit" class="px-6 py-3 bg-blue-500 text-white text-lg font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105">
                    Send Message
                </button>
            </div>
        </form>
        
    </div>
</div>
@endsection
