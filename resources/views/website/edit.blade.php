<x-guest-layout>
    <form method="POST" action="{{ route('websites.update', ['website' => $website]) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <!-- SS -->
        <div>
            <img id="preview-image-before-upload" src="/storage/{{ $website->ss }}"
                      alt="preview image" style="max-height: 250px;">
            <x-input-label for="ss" :value="__('Screenshot Website')" />
            <input
            class="relative m-0 mt-2 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
            type="file"
            id="ss" name="ss" />
            <x-input-error :messages="$errors->get('ss')" class="mt-2" />
        </div>

        <!-- CSS -->
        <div class="mt-4">

            <x-input-label for="css" :value="__('File CSS')" />
            <embed id="preview-file-before-upload" src="/storage/{{ $website->css }}"
                width="400px" height="250px" class="mb-2"/>
            <input
            class="relative m-0 mt-2 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-[0_0_0_1px] focus:shadow-primary focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:file:bg-neutral-700 dark:file:text-neutral-100"
            type="file"
            id="css" name="css" />
            <x-input-error :messages="$errors->get('css')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Submit') }}
            </x-primary-button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
      
        $(document).ready(function (e) {
         
           
           $('#ss').change(function(){
                    
            let reader = new FileReader();
         
            reader.onload = (e) => { 
         
              $('#preview-image-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });

           $('#css').change(function(){
                    
            let reader = new FileReader();
            
            reader.onload = (e) => { 
            
                $('#preview-file-before-upload').attr('src', e.target.result); 
            }
            
            reader.readAsDataURL(this.files[0]); 
                    
            });
           
        });
         
    </script>

</x-guest-layout>