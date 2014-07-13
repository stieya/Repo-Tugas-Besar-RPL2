create trigger tri_notif_company_upload_student_job_list
after insert on t_student_job_list
for each row 
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select tu.id_user from t_job_list tjl join t_job_sheet tjs on (tjl.id_job_sheet = tjs.id_job_sheet) join t_perusahaan tp on (tp.id_perusahaan = tjs.id_perusahaan) join t_user tu on (tu.id_user = tp.id_user) where tjl.id_job_list = new.id_job_list), 
concat('Upload file dari job list ', (select head from t_job_list where id_job_list = new.id_job_list)), 
concat(concat(concat('Upload file dari job sheet ', (select tjs.nama_job_sheet from t_job_list tjl join t_job_sheet tjs on (tjs.id_job_sheet = tjl.id_job_sheet) where tjl.id_job_list = new.id_job_list)), concat(', job list ', (select head from t_job_list where id_job_list = new.id_job_list))), concat(' dari student bernama ', (select nama from t_student where id_student = new.id_student))), 
current_timestamp, 
'0');
