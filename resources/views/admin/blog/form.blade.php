<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label" >Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ old('slug', $blog->slug ?? '') }}">
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if($blog && $blog->image)
                <a href="{{asset('/public/uploads/blogs/'.$blog->image)}}" target="_blank">
                    <img class="pt-2" style="width: 50px;" src="{{asset('/public/uploads/blogs/'.$blog->image)}}" />
                </a>
            @endif
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="form-label">Description</label>
                <textarea id="description" name="description" class="form-control" rows="10">{{ old('description', $blog->description ?? '') }}</textarea>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="{{ old('date', $blog->date ?? '') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label">Category</label>
            <select name="category_id" class="form-control">
                <option value="">-- Select --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $blog->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label">Tag</label>
            <input type="text" name="tag" class="form-control" value="{{ old('tag', $blog->tag ?? '') }}">
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status', $blog->status ?? '') == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $blog->status ?? '') == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Meta Title</label>
            <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title', $blog->meta_title ?? '') }}">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label">Meta Keyword</label>
            <input type="text" name="meta_keyword" class="form-control" value="{{ old('meta_keyword', $blog->meta_keyword ?? '') }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label class="form-label">Meta Description</label>
            <textarea name="meta_description" class="form-control">{{ old('meta_description', $blog->meta_description ?? '') }}</textarea>
        </div>
    </div>
</div>