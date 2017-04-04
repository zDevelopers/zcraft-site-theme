from bs4 import BeautifulSoup

article = """
# Enter article source here
"""

soup = BeautifulSoup(article, 'html.parser')

for table in soup.find_all('table'):
    for row in table.find_all('tr'):
        cols = row.find_all('td')
        if not cols:
            continue

        title = "".join([str(c) for c in cols[0].contents]).strip()
        desc = "".join([str(c) + '\n\n' for c in cols[1].contents]).strip() if len(cols) > 1 else ''
        coords = "".join([str(c) + '\n\n' for c in cols[3].contents]).strip() if len(cols) > 3 else ''

        print('\n<h3>', title, '</h3>\n', sep='')
        if desc: print(desc, '\n', sep='')

        gallery_open = False

        for div in cols[2].find_all(['div', 'strong']):
            if div.name == 'strong':
                if gallery_open:
                    print('[/zcraft_gallery]\n')
                print('<h4>', div.get_text(), '</h4>', sep='')
                print('[zcraft_gallery]')
                gallery_open = True
            else:
                if not gallery_open:
                    print('[zcraft_gallery]')

                link = div.find('a').get('href')
                img_src = div.find('img').get('src')
                img_alt = div.find('img').get('alt')
                desc = div.get_text().strip()
                print('[image src="', img_src, '"', ' alt="' + img_alt + '"' if img_alt else '', ' link="', link, '"]', desc, '[/image]', sep='')

        if gallery_open:
            print('[/zcraft_gallery]\n')

        if coords:
            print('\n<em><strong>Accès : </strong>', coords, '</em>', sep='')
