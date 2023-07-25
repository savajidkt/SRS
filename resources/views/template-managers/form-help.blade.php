                            <section>
                                <div class="row row-edit-template">
                                    <div class="col-lg-12 mb-4 form-style add_course_step_2_col">
                                        <div class="form-group edit-email-form-group edit-email-form-group-content">
                                            <label class="text-label">Course</label>
                                            <label class="text-label">{{ $model->course }}</label>
                                        </div>
                                        <div class="form-group edit-email-form-group">
                                            <label class="text-label">Name</label>
                                            <div class="email-content-style">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $model->name }}">
                                            </div>
                                        </div>                                       
                                        <div class="form-group edit-email-form-group subject-style">
                                            <label class="text-label">Notes</label>
                                            <div class="email-content-style">
                                                <textarea name="template" id="email-compose-editor" class="ckeditor textarea_editor form-control bg-transparent"
                                                    rows="15">
                                                    {{ $model->template }}
                                                </textarea>
                                                <label class="note-edit-email">NOTE : {*} denote label where data is
                                                    bind at runtime so please dont change it, you can change it's
                                                    position.</label>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </section>
