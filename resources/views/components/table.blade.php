@props([
'header' => '',
])
<div class="flex flex-col">
    <div class="-m-1.5 overflow-x-auto">
      <div class="p-1.5 min-w-full inline-block align-middle">
        <div class="border rounded-lg shadow overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
          <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-700">
              <tr>
                    {{$header}}
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                {{$slot}}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    document.querySelectorAll('th').forEach(el=>el.classList.add("px-6", "py-3", "text-left", "text-xs", "font-medium", "textblack-500", "uppercase"));
document.querySelectorAll('td').forEach(el=>el.classList.add("px-6", "py-4", "whitespace-nowrap", "text-sm", "font-medium", "text-black-800", "dark:text-black-200"));
</script>