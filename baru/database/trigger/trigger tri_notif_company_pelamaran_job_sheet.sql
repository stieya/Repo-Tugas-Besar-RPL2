create trigger tri_notif_company_pelamaran_jobsheet
after insert on t_job_sheet_application
for each row 
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select tu.id_user from t_job_sheet tjs join t_perusahaan tp on (tp.id_perusahaan = tjs.id_perusahaan) join t_user tu on (tu.id_user = tp.id_user) where tjs.id_job_sheet = new.id_job_sheet), 
concat('Pelamaran masuk untuk job sheet ', (select nama_job_sheet from t_job_sheet where id_job_sheet = new.id_job_sheet)), 
concat(concat('Pelamaran masuk untuk job sheet ', (select nama_job_sheet from t_job_sheet where id_job_sheet = new.id_job_sheet)), concat(' dari student bernama ', (select nama from t_student where id_student = new.id_student))), 
current_timestamp, 
'0');
