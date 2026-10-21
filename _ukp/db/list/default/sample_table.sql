select
    `st`.`sample_table_idx`,
    `st`.`foreign_idx`,
    `st`.`field`,
    `st`.`num`,
    `st`.`insert_date`,
    `st`.`insert_time`,
    `st`.`update_dt`,
    `st`.`delete_flag`
from
    `sample_table` as `st`
order by
    `st`.`sample_table_idx`
