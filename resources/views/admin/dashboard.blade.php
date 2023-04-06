<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12 text-white">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  {{ __("You're logged in!") }}
              </div>
          </div>
      </div>
  </div>
  
  <section id="admin_main" class="text-white ">
      <section id="temp" class="myCard mb-10 text-white"></section>
      <div id="users_table_card" class="myCard flex-column">
        <div class="">
            <h1 class="text-2xl">Users:</h1>
            <div id="email_validator" class="mx-auto">Disposable email: <b></b></div>
        </div>
        <br>
        <div id="users" >
            <table class="min-w-600">
                <thead>
                    <th>ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                </thead>
                <tbody>
                    {{-- append --}}
                </tbody>
            </table>
            <br>
        </div>
        <div class="mt-auto">
            <ul id="users_pagination" class="pagination flex gap-5"></ul>
        </div>
      </div>
      <br>
      <div class="myCard ">
        <div class="color-red" id="edit_user_msg"></div><br>
        <form id="edit_user_form" action="" method="post" class="w-600">
            {{-- @csrf --}}
            {{-- @method('PATCH') --}}
            <div class="mb-6">
                <label for="first_name_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First name:</label>
                <input name="first_name" type="text" id="first_name_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="last_name_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last name:</label>
                <input name="last_name" type="text" id="last_name_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6">
                <label for="addressEdit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                <input name="address" type="text" id="addressEdit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  required>
            </div>
            <div class="mb-6">
                <label for="emailEdit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input name="email" type="email" id="emailEdit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
            </div>
            <div class="mb-6">
                <label for="is_admin_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Is Admin:</label>
                <input name="is_admin" type="text" id="is_admin_edit" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            {{-- <div>
                <input type="hidden" name="_method" value="PATCH">
            </div> --}}
              <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit user</button>
              <a id="delete_user" class="color-red mx-5" href="">Delete</a>
        </form>
      </div>
  </section>
  <p></p>
</x-app-layout>
