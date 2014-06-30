create trigger tri_notif_company_pelamaran_jobsheet
before insert on t_job_sheet_application
for each row
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select id_user from t_job_sheet tjs join t_perusahaan tp on (tp.id_perusahaan = tjs.id_perusahaan) where tjs.id_job_sheet = new.id_job_sheet), 
concat('Pelamaran masuk untuk job sheet ', (select tjs.nama_job_sheet from t_job_sheet tjs where tjs.id_job_sheet = new.id_job_sheet)), 
concat(concat('Pelamaran masuk untuk job sheet ', (select tjs.nama_job_sheet from t_job_sheet tjs where tjs.id_job_sheet = new.id_job_sheet)), concat(' dari student bernama ', (select nama from t_student where id_student = new.id_student))), 
new.waktu_daftar, 
new.status);
