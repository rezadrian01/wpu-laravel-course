<x-layout :title="$title">
    <section class="max-w-2xl mx-auto bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Create Post</h2>
            <form action="/dashboard/{{$post->slug}}" method="POST">
                @csrf
                @method('PATCH')
                <div class=" mb-4 sm:mb-5 flex flex-col gap-4">
                    <div class="">
                        <label for="title"
                               class="@error('title') text-red-500 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title"
                               class="@error('title') bg-red-50 border-red-100 focus:ring-red-300 focus:border-red-300  @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               value="{{old('title') ?? $post->title}}" placeholder="Type post title" autofocus>
                        @error('title')
                        <span class="text-red-500 mt-2 block">{{$message}}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="@error('category_id') text-red-500 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                        <select
                            name="category_id"
                            id="category"
                            class="@error('category_id') bg-red-50 border-red-100 focus:ring-red-300 focus:border-red-300  @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected="" value="" disabled hidden>Select a Category</option>
                            @foreach($categories as $category)
                                <option value="{{old('category_id') ?? $category->id}}" @selected((old('category_id') ?? $post->category_id) == $category->id)>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-red-500 mt-2 block">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="">
                        <label for="body"
                               class="@error('category_id') text-red-500 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                        <textarea name="body" id="body" rows="8"
                                  class="@error('category_id') bg-red-50 border-red-100 focus:ring-red-300 focus:border-red-300  @enderror  block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                  placeholder="Write a Body Post description here...">{{old('body') ?? $post->body}}</textarea>
                        @error('body')
                        <span class="text-red-500 mt-2 block">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create Post
                    </button>
                    <a href="/dashboard"
                       class="text-red-600 inline-flex items-center border border-red-600 hover:text-white hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </section>
</x-layout>
