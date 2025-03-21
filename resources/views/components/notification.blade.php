<div x-data="{body:''}" x-cloak x-show="body.length" x-on:notification.window="
body=$event.detail[0].body ;
setTimeout(()=>{body=''} , $event.detail[0].timeout ?? 2000) ;
" class="fixed inset-0 flex px-4 py-6 items-start pointer-events-none">
    <div class="w-full flex flex-col items-center space-y-4">
        <div class="max-w-sm w-full bg-gray-900 rounded-lg pointer-events-auto">
            <div class="p-4 flex items-center">
                <div class="ml-2 w-0 flex-1 text-white" x-text="body"></div>
                <button @click="body=''" class="inline-flex text-gray-400">
                    <span class="sr-only">close</span>
                    <span class="text-2xl">X</span>
                </button>
            </div>
        </div>
    </div>
</div>