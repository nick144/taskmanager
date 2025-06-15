@props(['title' => '', 'bodyCssClass' => ''])

<x-base-layout :$title :$bodyCssClass>
  <x-layouts.header></x-layouts.header>
  
    <!-- Main Content -->
    <main class="py-4">
        {{ $slot }}
    </main> 

</x-base-layout>