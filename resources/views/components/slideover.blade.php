<div x-data="{ open: false }">
  <span @click.prevent="open = true">{{ $button }}</span>

  <div x-cloak x-show="open">
    <div class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <section x-show="open"
          x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
          x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
          x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
          class="absolute inset-y-0 pl-16 max-w-full right-0 flex"
          aria-labelledby="slide-over-heading">
          <div class="w-screen max-w-md">
            <form class="h-full divide-y divide-gray-200 flex flex-col bg-white shadow-xl">
              <div class="flex-1 h-0 overflow-y-auto">
                <div class="py-6 px-4 bg-indigo-700 sm:px-6">
                  <div class="flex items-center justify-between">
                    <h2 id="slide-over-heading" class="text-lg font-medium text-white">
                      {{ $title }}
                    </h2>
                    <div class="ml-3 h-7 flex items-center">
                      <button @click.prevent="open = false"
                        class="bg-indigo-700 rounded-md text-indigo-200 hover:text-white focus:outline-none focus:ring-2 focus:ring-white">
                        <span class="sr-only">Close panel</span>
                        <!-- Heroicon name: outline/x -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                        </svg>
                      </button>
                    </div>
                  </div>
                </div>
                <div class="flex-1 flex flex-col justify-between">
                  <div class="px-4 divide-y divide-gray-200 sm:px-6">
                    <div class="space-y-6 pt-6 pb-5">
                      <div>
                        <label for="project_name" class="block text-sm font-medium text-gray-900">
                          Project name
                        </label>
                        <div class="mt-1">
                          <input type="text" name="project_name" id="project_name"
                            class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
                        </div>
                      </div>
                      <div>
                        <label for="description" class="block text-sm font-medium text-gray-900">
                          Description
                        </label>
                        <div class="mt-1">
                          <textarea id="description" name="description" rows="4"
                            class="block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md"></textarea>
                        </div>
                      </div>
                      <div>
                        <h3 class="text-sm font-medium text-gray-900">
                          Team Members
                        </h3>
                        <div class="mt-2">
                          <div class="flex space-x-2">
                            <a href="#" class="rounded-full hover:opacity-75">
                              <img class="inline-block h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixqx=koY8aWhTq3&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Tom Warner">
                            </a>
                            <a href="#" class="rounded-full hover:opacity-75">
                              <img class="inline-block h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Sally Preston">
                            </a>
                            <a href="#" class="rounded-full hover:opacity-75">
                              <img class="inline-block h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixqx=koY8aWhTq3&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80"
                                alt="Dave Gusman">
                            </a>
                            <a href="#" class="rounded-full hover:opacity-75">
                              <img class="inline-block h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixqx=koY8aWhTq3&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                alt="Tom Cook">
                            </a>
                            <a href="#" class="rounded-full hover:opacity-75">
                              <img class="inline-block h-8 w-8 rounded-full"
                                src="https://images.unsplash.com/photo-1586297098710-0382a496c814?ixlib=rb-1.2.1&ixqx=koY8aWhTq3&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.5&w=256&h=256&q=80"
                                alt="Brandon Rogers">
                            </a>
                            <button type="button"
                              class="flex-shrink-0 bg-white inline-flex h-8 w-8 items-center justify-center rounded-full border-2 border-dashed border-gray-200 text-gray-400 hover:text-gray-500 hover:border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                              <span class="sr-only">Add team member</span>
                              <!-- Heroicon name: solid/plus -->
                              <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd" />
                              </svg>
                            </button>
                          </div>
                        </div>
                      </div>
                      <fieldset>
                        <legend class="text-sm font-medium text-gray-900">
                          Privacy
                        </legend>
                        <div class="mt-2 space-y-5">
                          <div class="relative flex items-start">
                            <div class="absolute flex items-center h-5">
                              <input id="privacy_public" name="privacy_public"
                                aria-describedby="privacy_public_description" type="radio"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                            </div>
                            <div class="pl-7 text-sm">
                              <label for="privacy_public" class="font-medium text-gray-900">
                                Public access
                              </label>
                              <p id="privacy_public_description" class="text-gray-500">
                                Everyone with the link will see this project.
                              </p>
                            </div>
                          </div>
                          <div>
                            <div class="relative flex items-start">
                              <div class="absolute flex items-center h-5">
                                <input id="privacy_private-to-project"
                                  name="privacy_private-to-project"
                                  aria-describedby="privacy_private-to-project_description"
                                  type="radio"
                                  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                              </div>
                              <div class="pl-7 text-sm">
                                <label for="privacy_private-to-project"
                                  class="font-medium text-gray-900">
                                  Private to project members
                                </label>
                                <p id="privacy_private-to-project_description"
                                  class="text-gray-500">
                                  Only members of this project would be able to access.
                                </p>
                              </div>
                            </div>
                          </div>
                          <div>
                            <div class="relative flex items-start">
                              <div class="absolute flex items-center h-5">
                                <input id="privacy_private" name="privacy_private"
                                  aria-describedby="privacy_private-to-project_description"
                                  type="radio"
                                  class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                              </div>
                              <div class="pl-7 text-sm">
                                <label for="privacy_private" class="font-medium text-gray-900">
                                  Private to you
                                </label>
                                <p id="privacy_private_description" class="text-gray-500">
                                  You are the only one able to access this project.
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </fieldset>
                    </div>
                    <div class="pt-4 pb-6">
                      <div class="flex text-sm">
                        <a href="#"
                          class="group inline-flex items-center font-medium text-indigo-600 hover:text-indigo-900">
                          <!-- Heroicon name: solid/link -->
                          <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-900"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z"
                              clip-rule="evenodd" />
                          </svg>
                          <span class="ml-2">
                            Copy link
                          </span>
                        </a>
                      </div>
                      <div class="mt-4 flex text-sm">
                        <a href="#"
                          class="group inline-flex items-center text-gray-500 hover:text-gray-900">
                          <!-- Heroicon name: solid/question-mark-circle -->
                          <svg class="h-5 w-5 text-gray-400 group-hover:text-gray-500"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                              clip-rule="evenodd" />
                          </svg>
                          <span class="ml-2">
                            Learn more about sharing
                          </span>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="flex-shrink-0 px-4 py-4 flex justify-end">
                <button type="button"
                  class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Cancel
                </button>
                <button type="submit"
                  class="ml-4 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  Save
                </button>
              </div>
            </form>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
