create trigger tri_notif_company_pelamaran_jobsheet
before insert on t_job_sheet_application
for each row
insert into t_notification(id_user, head, body, tanggal, status)
values (
(select tu.id_user from t_job_sheet tjs join t_job_sheet_application tjsa on (tjs.id_job_sheet = tjsa.id_job_sheet) 	join t_perusahaan tp on (tp.id_perusahaan = tjs.id_perusahaan) join t_user tu on (tu.id_user = tp.id_user) order by 	tjsa.id_job_sheet_application desc limit 1), 
concat('Pelamaran masuk untuk job sheet ', (select nama_job_sheet from t_job_sheet tjs join t_job_sheet_application tjsa on (tjsa.id_job_sheet = tjs.id_job_sheet) 	where tjs.id_job_sheet = new.id_job_sheet order by id_job_sheet_application desc limit 1)), 
concat(concat('Pelamaran masuk untuk job sheet ', (select 	nama_job_sheet from t_job_sheet tjs join t_job_sheet_application tjsa on (tjsa.id_job_sheet = tjs.id_job_sheet) where 	tjs.id_job_sheet = new.id_job_sheet order by id_job_sheet_application desc limit 1)), concat(' dari student bernama ', (select 	ts.nama from t_job_sheet_application tjsa join t_student ts on (ts.id_student = tjsa.id_student) where tjsa.id_job_sheet = 	new.id_job_sheet order by id_job_sheet_application desc limit 1))), 
current_timestamp, 
0);
