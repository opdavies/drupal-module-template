# https://just.systems

machine_name := `basename "$PWD"`

# Lists all recipes.
default:
  just --list

# Remove any unwanted files.
clean:
  @rm -fr composer.lock vendor

# Rename and update the template files.
rename module_name="My module": clean && (_update-file-contents module_name) _rename-files

_rename-files:
  @mv drupal_module_template.info.yml {{ machine_name }}.info.yml
  @mv drupal_module_template.routing.yml {{ machine_name }}.routing.yml
  @mv drupal_module_template.services.yml {{ machine_name }}.services.yml

_update-file-contents module_name:
  @sed -i "s/Drupal Module Template/{{ module_name }}/g" drupal_module_template.info.yml

  @find \
    -type f \
      ! -name .gitignore \
      ! -name .keep \
      ! -name justfile \
      ! -name phpcs.xml.dist \
      ! -path "./.git/**" \
      ! -path "./.github/**" \
      ! -path "./vendor/**" \
    -exec sed -i "s/drupal_module_template/{{ machine_name }}/g" {} \;
