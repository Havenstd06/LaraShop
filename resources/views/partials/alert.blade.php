@if(session('success'))
    <div class="w-1/3 p-4 mx-auto my-4 rounded-md bg-green-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg
                    class="w-5 h-5 text-green-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium leading-5 text-green-800">
                    Success!
                </h3>
                <div class="mt-2 text-sm leading-5 text-green-700">
                    <p>
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="w-1/3 p-4 mx-auto my-4 rounded-md bg-yellow-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg
                    class="w-5 h-5 text-yellow-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium leading-5 text-yellow-800">
                    Warning!
                </h3>
                <div class="mt-2 text-sm leading-5 text-yellow-700">
                    <p>
                        {{ session('warning') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="w-1/3 p-4 mx-auto my-4 rounded-md bg-red-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg
                    class="w-5 h-5 text-red-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium leading-5 text-red-800">
                    Error!
                </h3>
                <div class="mt-2 text-sm leading-5 text-red-700">
                    <p>
                        {{ session('error') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif

@if(count($errors) > 0)
    <div class="w-1/3 p-4 mx-auto my-4 rounded-md bg-red-50">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg
                    class="w-5 h-5 text-red-400"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                        clip-rule="evenodd"
                    />
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium leading-5 text-red-800">
                    There were {{ $errors->count() }} error(s) with your submission
                </h3>
                <div class="mt-2 text-sm leading-5 text-red-700">
                    <ul class="pl-5 list-disc">
                        @foreach($errors->all() as $error)
                            <li class="mt-1">
                                {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif